<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body>
        <form id="regexpEmailForm" class="form-horizontal">
    <div class="form-group">
        <label class="col-xs-3 control-label">Email address</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" name="email" />
        </div>
    </div>
</form>
    </body>
    </html>


<script>
$(document).ready(function() {
    $('#regexpEmailForm')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                email: {
                    validators: {
                        emailAddress: {
                            message: 'The value is not a valid email address'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        }
                    }
                }
            }
        })
        .on('err.validator.fv', function(e, data) {
            // data.bv        --> The FormValidation.Base instance
            // data.field     --> The field name
            // data.element   --> The field element
            // data.validator --> The current validator name

            if (data.field === 'email') {
                // The email field is not valid
                data.element
                    .data('fv.messages')
                    // Hide all the messages
                    .find('.help-block[data-fv-for="' + data.field + '"]').hide()
                    // Show only message associated with current validator
                    .filter('[data-fv-validator="' + data.validator + '"]').show();
            }
        });
});
</script>