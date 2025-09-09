function loadData() {
  $("#AboutUsTable").dataTable().fnDestroy();
  var table = $('#AboutUsTable').DataTable({
    "processing" : true,
    "serverSide" : false,
    "pagingType" : "full_numbers",
    "ajax"       : {
      url        : "actions/aboutus",
      type       : 'post',
      data       : { 'action' : 'showHomeDetails' },
    },

    "columns": [
      {
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        }
      },
      { "data" : "IMAGE_1", className :"text-center",
        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
          $(nTd).html(`<img height="100" src="${oData.IMAGE_1.replace('../', '')}"/>`);
        } 
      },
      { "data" : "IMAGE_2", className :"text-center",
        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
          $(nTd).html(`<img height="100" src="${oData.IMAGE_2.replace('../', '')}"/>`);
        } 
      },                      
      { "data" : "ID",
        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
          let bnTd = '';
          bnTd = `<a href="editAboutus?type=view&randomId=${oData.RANDOM_ID}" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;

            <a href="editAboutus?type=edit&randomId=${oData.RANDOM_ID}" title="Edit"><i class="far fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;

            <a href="javascript:void(0)" title="Delete" onclick="RemoveAccount(${oData.ID} ,'${oData.IMAGE_1}' ,'${oData.IMAGE_2}')"><i class="fas fa-trash"></i></a>&nbsp;&nbsp;`;
                $(nTd).html(bnTd);
        }
      }
    ],
    select: true,
    "lengthMenu": [[3, 5,10, 25, 50, -1], [3, 5,10, 25, 50, "All"]],
    columnDefs: [
      { className: 'text-center', targets: [0,3] },
    ],
    aoColumnDefs : [{'bSortable' : false, 'aTargets' : ['no-sort']}],
    sPaginationType : 'full_numbers',
  });
}

$(document).ready(function() {
  loadData();
});

function RemoveAccount(id,image1,image2) {
  let check = confirm('Are You Sure You want To delete This Data..?');
  if(check) {
    $.ajax({
      url  : "actions/aboutus",
      type : "post",
      data : { 'id' : id,'image' : image1, 'image2' : image2, 'action' : 'delete' },
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