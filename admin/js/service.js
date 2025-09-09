function loadData() {
  $("#ServiceTable").dataTable().fnDestroy();
  var table = $('#ServiceTable').DataTable({
    "processing" : true,
    "serverSide" : false,
    "pagingType" : "full_numbers",
    "ajax"       : {
      url        : "actions/service",
      type       : 'post',
      data       : { 'action' : 'show' },
    },

    "columns": [
      {
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        }
      },
      { "data" : "TITLE" },
      { "data" : "DESCRIPTION" }, 
      { "data" : "IMAGE",
        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
          $(nTd).html(`<img height="100" src="${oData.IMAGE.replace('../', '')}"/>`);
        } 
      },           
      { "data" : "ID",
        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
          let bnTd = '';
          bnTd = `<a href="editService?type=view&randomId=${oData.RANDOM_ID}" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;

            <a href="editService?type=edit&randomId=${oData.RANDOM_ID}" title="Edit"><i class="far fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;

            <a href="javascript:void(0)" title="Delete" onclick="RemoveAccount(${oData.ID},'${oData.IMAGE}')"><i class="fas fa-trash"></i></a>&nbsp;&nbsp;`;
                $(nTd).html(bnTd);
        }
      }
    ],
    select: true,
    "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
    columnDefs: [
      { className: 'text-center', targets: [0,4] },
    ],
    aoColumnDefs : [{'bSortable' : false, 'aTargets' : ['no-sort']}],
    sPaginationType : 'full_numbers',
  });
}

$(document).ready(function() {
  loadData();
});

function RemoveAccount(id,image) {
  let check = confirm('Are You Sure You want To delete This Data..?');
  if(check) {

    $.ajax({

      url  : "actions/service",
      type : "post",
      data : { 'id' : id, 'image' : image, 'action' : 'delete' },
      success: function(data) {
        if(data == 'true') {
          toastr.success('Deleted Successfully...!');
          setTimeout(function(){
            loadData();
          },1000);
        }
      }
    });
  }
  return false;
}