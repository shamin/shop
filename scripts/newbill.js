$("#addrow").click(function () {
    var newitem = '<tr class="item-row"><td><span class="id">'+ ($(".item-row").length + 1) +'</span></td><td><input type="text" class="form-control name" ></td><td><span class="cost">0</span></td><td><input type="text" class="form-control qty" ></td><td><span class="price">0</span></td><td><a class="delete" href="javascript:;" title="Remove row">X</a></td></tr>';
    $(".item-row:last").after(newitem);
    if ($(".delete").length > 0)
        $(".delete").show();
});

$(document.body).on('click', '.delete', function () {
    $(this).parents('.item-row').remove();
    if ($(".delete").length < 2)
        $(".delete").hide();
});
if ($(".delete").length < 2)
{
    $(".delete").hide();
}

$(document.body).on('keyup', ".qty", update_price);
function update_price() {
    var row = $(this).parents('.item-row');
    var price = row.find('.cost').text() * row.find('.qty').val();
    isNaN(price) ? row.find('.price').html("N/A") : row.find('.price').html("" + price);
}

$(document.body).on('keyup', ".name", search);
function search()
{
    var row = $(this).parents('.item-row');
    if (row.find('.name').val() !== "")
    {
        var formvalues = "&term=" + row.find('.name').val() + "&no=" + row.index('.item-row');
        $.ajax({
            type: 'POST',
            url: 'getitem.php',
            data: formvalues,
            beforeSend: function (html) {
            },
            success: function (html) {
                $('#results').html(html);
            }
        });
    } else
    {
        clearresults();
    }
}

function clearresults()
{
    $('#results').html(null);
}

$("#results").on('click', "a", function () {
    var rowno = $(this).attr('class').replace('row', '');

    var row = $('.item-row').eq(rowno);
    var slno = row.find('.id').text();

    var itemid = $(this).attr('data-id');


    var formvalues = "&id=" + itemid + "&slno=" + slno;
    $.ajax({
        type: 'POST',
        url: 'getitemdetails.php',
        data: formvalues,
        beforeSend: function (html) {
        },
        success: function (html) {
            row.html(html);
        }
    });
    clearresults();
});

$('#save').click(function () {
    $.ajax({
        type: 'POST',
        url: 'savebill.php',
        data: null,
        beforeSend: function (html) {
        },
        success: function (html) {
            saveallitems();
        }
    });
});
function saveallitems()
{
    var billno = $("#billno").text();
    $('.item-row').each(function () {
        var productid = $(this).find('.id').attr('data-id');
        var qty = $(this).find('.qty').val();
        var formvalues = "&productid=" + productid + "&qty=" + qty + "&billno=" + billno;
        $.ajax({
            type: 'POST',
            url: 'savebillitems.php',
            data: formvalues,
            beforeSend: function (html) {
            },
            success: function (html) {  
            }   
        });
    });
    window.location.href='./newbill.php';
    alert("Bill Saved");    
}

