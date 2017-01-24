<form class="form-horizontal frmContent" id="Form" method="post">
    <span class="frmMsg"></span>
    
    <div class="form-group">
        <label class="col-sm-3 control-label">Code <span class="text-danger"> * </span></label>
        <a class="help-icon" data-container="body" data-toggle="popover" data-placement="right" data-content="Please Enter Code">
            <i class="fa fa-question-circle"></i>
        </a>
        <div class="col-sm-3">
           <?php echo form_input(array('name' => 'code', 'value' =>$max_code, 'flag'=> 'add','data_tbl' => 'bn_name','data_field' => 'Full_CODE', 'type'=>'input', 'maxlength' => '8', 'minlength' => '1', "class" => "BASIC_CODE integerNumbersOnly form-control required", 'placeholder' => 'Enter Code')); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Full Name <span class="text-danger"> * </span></label>
        <a class="help-icon" data-container="body" data-toggle="popover" data-placement="right" data-content="Please Enter Full Name">
            <i class="fa fa-question-circle"></i>
        </a>
        <div class="col-sm-6">
           <?php echo form_input(array('name' => 'Full_name', "class" => "form-control required" 'placeholder' => 'Full name')); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Full Name (বাংলা)</label>
        <a class="help-icon" data-container="body" data-toggle="popover" data-placement="right" data-content="Please Enter Full Name(বাংলা)">
            <i class="fa fa-question-circle"></i>
        </a>
        <div class="col-sm-6">
           <?php echo form_input(array('name' => 'Full_name_bn', "class" => "form-control" 'placeholder' => 'Full name (বাংলা)')); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Branch <span class="text-danger"> * </span></label>
        <a class="help-icon" data-container="body" data-toggle="popover" data-placement="right" data-content="Pleace Select Branch Name">
            <i class="fa fa-question-circle"></i>
        </a>
        <div class="col-sm-4">
            <select class="selectpicker form-control required" name="BRANCH_ID" id="BRANCH_ID" data-tags="true" title="Select Branch" data-action-box="true" data-live-search="true" data-size="5" >
                <?php
                foreach ($branch as $row):
                    ?>
                    <option value="<?php echo $row->BRANCH_ID ?>"><?php echo $row->BRANCH_NAME ?></option>
                <?php
                endforeach; 
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Equivalent Branch <span class="text-danger"> * </span></label>
        <a class="help-icon" data-container="body" data-toggle="popover" data-placement="right" data-content="Pleace Select Equivalent Branch">
            <i class="fa fa-question-circle"></i>
        </a>
        <div class="col-sm-4">
            <select class="selectpicker form-control required" name="equivalentFull_ID" id="equivalentFull_ID" data-tags="true" title="Select Equivalent Branch" data-action-box="true" data-live-search="true" data-size="5">
                <?php
                foreach ($equivalent_Full as $row):
                    ?>
                    <option value="<?php echo $row->EQUIVALANT_ID ?>"><?php echo $row->BRANCH_NAME ?></option>
                <?php
                endforeach; 
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo $this->lang->line('SERVICE_LIMIT'); ?> <span class="text-danger"> * </span></label>
        <a class="help-icon" data-container="body" data-toggle="popover" data-placement="right" data-content="Please Enter Service Limit">
            <i class="fa fa-question-circle"></i>
        </a>
        <div class="col-sm-3">
            <?php echo form_input(array('name' => 'SERVICE_LIMIT',  "class" => "form-control caste_name required", 'placeholder' => $this->lang->line('SERVICE_LIMIT'))); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo $this->lang->line('AGE_LIMIT'); ?> <span class="text-danger"> * </span></label>
        <a class="help-icon" data-container="body" data-toggle="popover" data-placement="right" data-content="Please Enter Age Limit">
            <i class="fa fa-question-circle"></i>
        </a>
        <div class="col-sm-3">
            <?php echo form_input(array('name' => 'AGE_LIMIT',  "class" => "form-control caste_name required" , 'placeholder' => $this->lang->line('AGE_LIMIT'))); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo $this->lang->line('is_active'); ?></label>
        <div class="col-sm-6">
            <div class="checkbox checkbox-inline checkbox-primary">
                <?php echo form_checkbox('ACTIVE_STATUS', '1', TRUE, 'class="styled"'); ?>
                <label for="ACTIVE_STATUS"></label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">&nbsp;</label>
        <div class="col-sm-6">
            <input type="button" class="btn btn-primary btn-sm formSubmit" data-action="setup/Full/saveFull" data-su-action="setup/Full/FullList" data-type="list" value="submit">
        </div>
    </div>
</form>

<script>
    $(document).on("click", ".formSubmit", function () {
        var field = $(this).closest('form').find('.required');
        var isValid = 0;
        var status = $('.BASIC_CODE').attr('status');
        status = (status == '' || status == undefined )? $('.BASIC_CODE_CONDITION').attr('status') : status;
        field.each(function () {
            $(this).keyup(function () {
                $(this).css("border", "1px solid #ccc");
            });
            $(this).change(function () {
                $(this).next('span').css("border", "1px solid #ccc");
                $(this).next('div').find('button').css("border", "1px solid #ccc");
            });
            
            var attr_name = $(this).attr('name');

            if ($(this).val() == ""  && typeof attr_name != 'undefined') {
                var label = $(this).parent().siblings("label").text();                
                $(this).siblings(".validation").html(label + " is required");
                $(this).css("border", "1px solid red");
                $(this).next('div').find('button').css("border", "1px solid red");
                $(this).next('span').css("border", "1px solid red");
                isValid = 1;
                //return false;
            }else if(status == "duplicate_code"){
                $(".BASIC_CODE").css("border", "1px solid red");
                $(".BASIC_CODE_CONDITION").css("border", "1px solid red");
                isValid = 1;
            } else {
                $(this).siblings(".validation").html("");
                $(this).css("border", "1px solid #ccc");
                $(this).next('span').css("border", "1px solid #ccc");
                $(".BASIC_CODE").css("border", "1px solid #ccc");
                $(".BASIC_CODE_CONDITION").css("border", "1px solid #ccc");
            }
        });
        if (isValid == 0) {
            if (confirm("Are You Sure?")) {
                var frmContent = $(".frmContent").serialize();
                var action_uri = $(this).attr("data-action");
                var type = $(this).attr("data-type");
                var success_action_uri = $(this).attr("data-su-action");
                var ac_type = $(this).attr("");
                var param = "";
                if (type != "list") {
                    param = $(".rowID").val();
                }
                var sn = $("#loader_" + param).siblings("span").text();
                $.ajax({
                    type: "post",
                    data: frmContent,
                    url: "<?php echo site_url(); ?>/" + action_uri,
                    beforeSend: function () {
                        $(".loadingImg").html("<img src='<?php echo base_url(); ?>dist/img/loader-small.gif' />");
                    },
                    success: function (data) {
                        $(".loadingImg").html("");
                        $(".frmMsg").html(data);
                        $.ajax({
                            type: "post",
                            data: {param: param},
                            url: "<?php echo site_url(); ?>/" + success_action_uri,
                            beforeSend: function () {
                                if (type != "list") {
                                    $("#loader_" + param).removeClass("hidden").html("<img src='<?php echo base_url(); ?>dist/img/loader-small.gif' style='width:10px;' />").siblings("span").addClass("hidden");
                                }
                            },
                            success: function (data1) {
                                //$(".loadingImg").html("");
                                if (type == "list") {
                                    $(".contentArea").html(data1);
                                    /*$(".gridTable").dataTable();*/
                                } else if (type == "msg") {
                                    $('#rinci').html(response).modal();
                                } else {
                                    $("#loader_" + param).addClass("hidden").html("").siblings("span").removeClass("hidden");
                                    $("#row_" + param).html(data1);
                                    $("#loader_" + param).siblings("span").html(sn);
                                }
                            }
                        });
                    }
                });
            } else {
                return false;
            }
        } else {
            return false;
        }
    });
</script>