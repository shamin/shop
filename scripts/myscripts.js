/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$('.progress').hide();
$("#addrow").click(function () {
    var newitem = '<tr class="item-row"><td><span class="id">'+($(".item-row").length +1)+'</span></td><td><input class="name" type="text" placeholder="Name"></td><td><span class="cost">0</span></td><td><input class="qty" type="number" placeholder="0"></td><td><span class="price">0</span></td><td><a class="delete" href="javascript:;" title="Remove row">X</a></td></tr>';
    $(".item-row:last").after(newitem);
    if ($(".delete").length > 0)
        $(".delete").show();
    bind();
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

function update_price() {
    var row = $(this).parents('.item-row');
    var price = row.find('.cost').text() * row.find('.qty').val();
    isNaN(price) ? row.find('.price').html("N/A") : row.find('.price').html("" + price);
}

function bind()
{
    $(".qty").blur(update_price);
    $(".name").keyup(search);
}
bind();
function search()
{
    var row = $(this).parents('.item-row');
    if (row.find('.name').val() !== "")
    {
        var formvalues = "&term=" + row.find('.name').val();
        $.ajax({
            type: 'POST',
            url: 'getitem.php',
            data: formvalues,
            beforeSend: function (html) {
                $('.progress').show();
            },
            success: function (html) {
                $('.progress').hide();
                $('#results').html(html);
            }
        });
    } else
    {
        $('#results').html(null);
    }
}


