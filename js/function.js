//-----start edit client-------------------------------------

function goEditEmp(editId)
{ 
    alert("edit");
      $.ajax({
        url: 'action/actClients.php',
        method: 'POST',
        data: {
          editId: editId
        },
        //dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {

          $('#editid').val(response.client_id);
          $('#editname').val(response.client_name);
          $('#editCompany').val(response.client_company);
          $('#editlocation').val(response.client_location);
          $('#editemail').val(response.client_email);
          $('#editmobile').val(response.client_phone);
          $('#editgst').val(response.client_gst);
          
          

          $('#clientTable').load(location.href + ' #clientTable > *', function() {
                               
                               $('#clientTable').DataTable().destroy();
                               
                                $('#clientTable').DataTable({
                                    "paging": true, // Enable pagination
                                    "ordering": true, // Enable sorting
                                    "searching": true // Enable searching
                                });
                            });
         

        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    
}
//-----end edit Client-------------------------------

//-----------start view client---------------------

function goViewClient(id)
{
    //location.href = "clientDetail.php?clientId="+id;
    $.ajax({
        url: 'clientDetail.php',
        method: 'POST',
        data: {
            id: id
        },
        //dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
          $('#clientTable').hide();
          $('#clientDetail').html(response);
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
}


//-----------end view client ----------------------

//pdf download --------------- -----------------
$(document).ready(function() {
    $('#myForm').submit(function(e) {
        e.preventDefault(); // Prevent form submission

        var formData = new FormData(this);
        
        
        
        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: 'process.php', // URL of the PHP script
            data: formData, // Form data to be sent
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Prevent jQuery from setting the Content-Type header
            success: function(response) {
                $('#collegeStoreModal').modal('hide'); // Close the modal
                $('#myForm')[0].reset();
                
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
            }
        });
    });
});

//------------end pdf -------------------------------


//--end pdf download------------

