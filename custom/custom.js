var shtoPerdoruesTable;
$(document).ready(function(){
    $("#shtoPerdoruesModalBtn").on('click', function(){
       //reset the form
        $("#shtoPerdoruesForm")[0].reset();

            $(".form-group").removeClass('has-error').removeClass('has-success');
        $(".text-danger").remove();

        $("#shtoPerdoruesForm").unbind('submit').bind('submit',function(){

            $(".text-danger").remove();

            var form = $(this);


            //validation
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var userName = $("#userName").val();
            var password = $("#password").val();
            var password = $("#password").val();

            if(firstName == ""){
                $("#firstName").closest('.form-group').addClass('has-error');
                $("#firstName").after('<p class="text-danger"> Emri nuk mund te jete bosh!</p>');
            }
            else{
                 $("#firstName").closest('.form-group').removeClass('has-error');
                 $("#firstName").closest('.form-group').addClass('has-success');

            }
            if(lastName == ""){
                $("#lastName").closest('.form-group').addClass('has-error');
                $("#lastName").after('<p class="text-danger"> Mbiemri nuk mund te jete bosh!</p>');
            }
            else{
                 $("#lastName").closest('.form-group').removeClass('has-error');
                 $("#lastName").closest('.form-group').addClass('has-success');

            }
            if(userName == ""){
                $("#userName").closest('.form-group').addClass('has-error');
                $("#userName").after('<p class="text-danger"> Username nuk mund te jete bosh!</p>');
            }
            else{
                 $("#userName").closest('.form-group').removeClass('has-error');
                 $("#userName").closest('.form-group').addClass('has-success');

            }

            if(password == ""){
                $("#password").closest('.form-group').addClass('has-error');
                $("#password").after('<p class="text-danger"> Password nuk mund te jete bosh!</p>');
            }
            else{
                 $("#password").closest('.form-group').removeClass('has-error');
                 $("#password").closest('.form-group').addClass('has-success');

            }

            if ( firstName && lastName && userName && password){
                $.ajax({
                    URL: form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
                    datatype: 'json',
                    success:function(response) {

                        // remove the error
                        $(".form-group").removeClass('has-error').removeClass('has-success');

                        if(response.success == true) {
                            $(".message").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                             '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                             '<strong> <span class="glyphicon glyphicon-ok"></span> </strong>'+response.message+
                            '</div>');

                            // reset the form
                            $("#shtoPerdoruesForm")[0].reset();

                            // this function is built in function of datatables;
                        } else {
                            $(".message").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                             '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                             '<strong> <span class="glyphicon glyphicon-exclamation"></span></strong>'+response.message+
                            '</div>');
                        } // /else
                    } // success

                });
            }

            return false;
        });
    });
});
