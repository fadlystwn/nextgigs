/*preview image before upload*/

function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#img_prev')
.attr('src', e.target.result)
.width(280)
.height(350)
};

reader.readAsDataURL(input.files[0]);
}
};