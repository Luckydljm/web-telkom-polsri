// contact
$(document).ready(function () {
  let t = $('#contactTable').DataTable({
    stateSave: true,
    lengthMenu: [
      [5, 10, 15, -1],
      ['5', '10', '15', 'All'],
    ],
  });

  $('.btn-delete-contact').click(function () {
    let id = $(this).data('id');
    let type = $(this).attr('data-type');
    $('.id_contact').val(id);
    $('.type').empty();
    $('.type').append(type);
  });
});

// content
$(document).ready(function () {
  $('.btn-delete-content').click(function () {
    let id = $(this).data('id');
    let section = $(this).attr('data-section');
    $('.id_content').val(id);
    $('.section').empty();
    $('.section').append(section);
  });
});

// Summernote initialize
// $(document).ready(function () {
//   $('#textEditor').summernote();
// });
