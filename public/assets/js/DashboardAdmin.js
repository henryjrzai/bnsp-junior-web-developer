$(document).ready(function() {
  
  // Get data from server
  $('#employee').DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ajax: {
      url: 'admin/employee',
      type: 'GET'
    },
    columns: [
      {
        render: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        },
      },
      { data: 'name' },
      { data: 'email' },
      { data: 'position' },
      { data: 'phone' },
      {
        "render": function(data, type, row) {
            return `
              <a href="/admin/employee/${row.id}" class="btn btn-primary btn-sm text-white"><i class="fa-solid fa-circle-info"></i></a>
              <a id="update" href="/admin/employee/${row.id}/edit" class="btn btn-primary btn-sm text-white"><i class="fa-solid fa-pen-to-square"></i></a>
              <button id="delete" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            `;
        }
      }
    ]
  })


  $.ajax({
      url: 'admin/dashboard',
      type: 'GET',
      success: function(data) {
          $('#manager').text(`${data.position.manager} Orang`);
          $('#lead').text(`${data.position.lead} Orang`);
          $('#staff').text(`${data.position.staff} Orang`);
          $('#intern').text(`${data.position.intern} Orang`);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.log("AJAX request failed: ", textStatus, errorThrown);
      }
  });
});