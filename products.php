<?php include("include/header.php"); ?>




<div class="container">
    <h1 class="classtitle">Products</h1>

    <div class="tabsection">
        <!--<ul class="nav nav-tabs">
    <li class="active"><a class="active" data-toggle="tab" href="#allclasses">All Classe</a></li>
    <li><a data-toggle="tab" href="#schedule">Schedule</a></li>
    <li><a data-toggle="tab" href="#exceptions">Exceptions</a></li>
  </ul>-->

        <div class="searchbox">
            <form>

                <input type="text" class="searchtext" placeholder="Search...">
                <input type="submit" class="searchsumit" value="">
            </form>
        </div>
    </div>
</div>


<!-- Page -->
<div class="page">
    <div class="page-header">
        <h1 class="page-title">New_Products
            <?php if(empty($this->session->userdata('products')) || !in_array('ecommerce',$this->session->userdata('products')) || $this->session->userdata('status')=='trialing') { ?><a
                href="javascript:void(0)" class="ml-10" data-trigger="hover" data-toggle="popover"
                data-content="This is a premium feature. Available in elite plan."><i
                    class="fa fa-bolt"></i></a><?php } ?></h1>
        <div class="page-header-actions">
            <a href="<?php base_url(); ?>add_product" class="btn btn-block btn-warning waves-effect waves-classic">
                <i class="icon fa fa-plus" aria-hidden="true"></i>
                Add a Product
            </a>
        </div>
    </div>
    <div class="page-content">
        <?php $flashdata = $this->session->flashdata('err');
        if (!empty($flashdata)) { ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <?php echo $flashdata; ?>
        </div>
        <?php } ?>
        <?php $flashdata = $this->session->flashdata('msg');
        if (!empty($flashdata)) { ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <?php echo $flashdata; ?>
        </div>
        <?php } ?>
        <?php if(!in_array('ecommerce',$this->session->userdata('products'))) { ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button><?php $addons = $this->session->userdata('addons'); ?>
            Shop module is not enabled in your current plan. You can <a href="javascript:void(0)" data-toggle="modal"
                data-target="#changeplan">upgrade to the Elite plan</a> or <a href="javascript:void(0)" class="addonBtn"
                data-id="<?=$addons['ecommerce']['id']; ?>">add this module for
                <?=$addons['ecommerce']['price']; ?>/mo</a>.
        </div>
        <?php } ?>
        <!-- Panel -->
        <?php if(!empty($products)){ ?>
        <div class="panel c-box-shadow">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <!--<span>Sort By Category : </span>-->
                        <div class="form-group inline-block filterBox">
                            <select data-plugin="selectpicker" id="category-sort" data-style="btn-outline btn-default">
                                <option value="">Sort by Category</option>
                                <?php if (!empty($categories)) {
                          foreach ($categories as $cat) { ?>
                                <option value="<?php echo @$cat->id; ?>"><?php echo @$cat->category_name; ?></option>
                                <?php }
                        } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="prodcutList" role="tabpanel">
                        <?php foreach($products as $product){  ?>
                        <div class="tab-content">
                            <div id="allclasses" class="tab-pane fade in active show">
                                <div class="classbox">
                                    <div class="toppart">
                                        <div class="leftside">
                                            <h2 class="classname">
                                                <?php echo $product->product_name; ?>
                                            </h2>

                                            <ul class="classdays">
                                                <li><?php echo $product->category_name; ?></li>
                                            </ul>
                                            <li class="date">Updated on:<span class="update">
                                                    <?php echo $product->updated_on->format("M d, Y g:i a"); ?></span>
                                            </li>
                                        </div>
                                        <div class="rightside">
                                            <ul class="editdel">
                                                <li> <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                    <ul class="innereditdel">
                                                        <li><a id="editProduct_<?php echo $product->id; ?>"
                                                                href="<?=base_url(); ?>ecommerce/add_product/<?php echo $product->id; ?>"
                                                                class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row p-0 mr-0"
                                                                data-toggle="tooltip" data-original-title="Edit">
                                                                <i class="icon fa fa-pencil" aria-hidden="true"></i>
                                                                Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a id="deleteProduct_<?php echo $product->id;?>"
                                                                href="javascript:void(0)"
                                                                class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row p-0 delete-record"
                                                                data-product_id="<?php echo $product->id;?>">
                                                                <i class="icon fa fa-trash" aria-hidden="true"></i>
                                                                Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="bottompart">
                                        <div class="type">
                                            Stock level: <span><?php echo $product->stock_level; ?></span>
                                        </div>
                                        <div class="actbtn">
                                            <div class="doller">$<?php echo $product->price; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>


                    </div>



                </div>

            </div>
            <!-- End Panel -->
        </div>
        <?php } else {  ?>
        <div class="placeholderbox">
            <img src="<?=base_url(); ?>assets/images/placeholder-image.png" style="max-width:200px" />
            <h3>Add your first product</h3>
            <p>You can sell physical or digital products here. </p>
            <br>
            <a href="<?php base_url(); ?>add_product" class="btn btn-block btn-warning waves-effect waves-classic">
                <i class="icon fa fa-plus" aria-hidden="true"></i>
                Add a Product
            </a>
        </div>

        <?php } ?>
        <!-- Add Product  -->
        <section class="addclass">

            <button type="button" class="btn btn-info btn-lg addclass" data-toggle="modal" data-target="#addclass">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
            <div id="addclass" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="addclastopsection">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i>
                            </button>
                            <h2 class="titleaddclass">Add Product</h2>
                        </div>

                        <div class="addclasstab">

                            <ul class="nav nav-tabs">
                                <li class="active"><a class="active" data-toggle="tab" href="#home">Info</a></li>
                                <li><a data-toggle="tab" href="#menu2">Price</a></li>
                                <li><a data-toggle="tab" href="#menu1">Settings</a></li>
                                <li><a data-toggle="tab" href="#menu3">Images</a></li>
                            </ul>
                            <form>
                                <div class="tab-content addclasscoantentarea">
                                    <!-- home -->
                                    <div id="home" class="tab-pane fade in active show">
                                        <div class="naembox">
                                            <label for="first-name">Product Name</label>
                                            <label class="errormsg">*</label><br>
                                            <input type="text" id="classname" name="class_name"
                                                placeholder="Enter Product Name">
                                            <span id="spnCharLeft">150/150</span>
                                        </div>

                                        <div class="naembox">
                                            <label for="fname">SKU<label class="errormsg">*</label></label><br>
                                            <input type="text" id="classname" name="class_name" placeholder="Enter SKU">
                                        </div>

                                        <div class="naembox">
                                            <label for="fname">Short Description<label
                                                    class="errormsg">*</label></label><br>
                                            <input type="text" id="classname" name="class_name"
                                                placeholder="Add Short Description">
                                            <span id="spnCharLeft">150/150</span>
                                        </div>

                                        <div class="disbox">
                                            <label for="fname">Description</label><br>
                                            <textarea type="text" id="discription" name="description"
                                                placeholder="Add class description"></textarea>
                                            <span id="spnCharLefts">500/500</span>
                                        </div>
                                        <a class="nextsec" data-toggle="tab" href="#menu2">NEXT</a>
                                    </div>
                                    <!-- home -->
                                    <!-- second section -->
                                    <div id="menu2" class="tab-pane fade">
                                        <div class="naembox">
                                            <label for="fname">Product Price<label
                                                    class="errormsg">*</label></label><br>
                                            <input type="text" id="classname" name="class_name" placeholder="0">
                                        </div>

                                        <div class="naembox">
                                            <label for="fname">Special Price</label><br>
                                            <input type="text" id="classname" name="class_name" placeholder="0">
                                        </div>

                                        <div class="naembox">
                                            <label for="fname">Starting stock level<label
                                                    class="errormsg">*</label></label><br>
                                            <input type="text" id="classname" name="class_name"
                                                placeholder="Enter Stock Level">
                                        </div>
                                        <a class="nextsec" data-toggle="tab" href="#menu1">NEXT</a>
                                    </div>
                                    <!-- second section -->
                                    <!-- first section -->
                                    <div id="menu1" class="tab-pane fade">
                                        <div class="naembox">
                                            <label for="fname">fulfillment time<label
                                                    class="errormsg">*</label></label><br>
                                            <input type="text" id="classname" name="class_name"
                                                placeholder="eg. 2-3 Business Days">
                                        </div>

                                        <div class="naembox">
                                            <label for="fname">featured Highlight</label><br>
                                            <input type="text" id="classname" name="class_name"
                                                placeholder="eg. Free Return">
                                        </div>

                                        <div class="naembox">
                                            <label for="fname">category<label class="errormsg">*</label></label><br>
                                            <select class="drpdwn" name="category-name" id="category-name">
                                                <option value="" selected>Please Choose...</option>
                                                <option value="0">Open when powered (most valves do this)</option>
                                                <option value="1">Closed when powered, auto-opens when power is cut
                                                </option>
                                            </select>
                                        </div>

                                        <div class="chkbxs">
                                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                            <label for="vehicle1">Digital Product</label><br>
                                        </div>
                                        <a class="nextsec" data-toggle="tab" href="#menu3">NEXT</a>
                                    </div>
                                    <!-- first section -->

                                    <!-- third section -->
                                    <div id="menu3" class="tab-pane fade">
                                        <label for="fname" class="labeltext">fatured image</label>
                                        <br>
                                        <input type="file" id="InputFile" onchange="selectFile();" name="file" multiple
                                            hidden="hidden" />
                                        <button type="button" id="buttonStyle" onclick="FileUpload();"><i
                                                class="bi bi-plus"></i> </button>
                                        <span id="errormsg">Click to upload</span>
                                    </div>
                                    <!-- third section -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Add Product  -->
    </div>
</div>
<!-- End Page -->
<script>
var base_url = '<?php echo base_url();?>';
</script>
<?php include("include/footer.php"); ?>

<script type="text/javascript">
$(document).ready(function() {
    $('#text-filter').on('keyup', function() {

        var $this = $(this),
            text_filter_value = $this.val().toLowerCase();
        console.log(text_filter_value);
        $('.item').each(function(index, element) {
            var name = $(this).data('name').toLowerCase();
            var charLength = text_filter_value.length;
            if (name.substring(0, charLength).toLowerCase() === text_filter_value.substring(0,
                    charLength).toLowerCase()) {
                $(this).show('slow');
            } else if (text_filter_value === '') {
                // If text input is empty show all
                $(this).show('slow');
            } else {
                $(this).hide('slow');
            }
        });
    });

    $("#category-sort").on("change", function(e) {
        // e.preventDefault();
        var cat = $(this).val();
        $.ajax({
            type: 'post',
            data: {
                cat: cat
            },
            url: '<?php echo base_url();?>ecommerce/products_filter/',
            async: false,
            success: function(data) {
                $("#prodcutList").html(data);
            }
        });
    })


});
</script>
<script>
$('.delete-record').on('click', function() {
    var product_id = $(this).data('product_id');

    var r = confirm("Do you want to delete this?");
    if (r == true) {
        location.href = '<?php echo base_url();?>ecommerce/delete_product/' + product_id;
    } else {
        return false;
    }
});
</script>
<script>
function view_note() {
    $.ajax({
        type: 'get',
        url: '<?php echo base_url();?>dashboard/update_notification/',
        async: false,
        success: function(data) {
            $('#note').html('');
            $('#note2').html('');
            // window.location="<php echo base_url();?>dashboard";
        }
    });
}
</script>
<script src="<?= base_url('assets/js/datatable/products.js'); ?>"></script>

<script>
function FileUpload11() {
    let data = document.getElementById("InputFile").files[0];
    let entry = document.getElementById("InputFile").files[0];
    console.log('FileUpload', entry, data)
    fetch('uploads/' + encodeURIComponent(entry.name), {
        method: 'PUT',
        body: data
    });
    alert('your file has been uploaded');
    location.reload();
};
</script>



<script type='text/javascript'>
$('#spnCharLefts').css('display', 'block');
var maxLimit = 500;
$(document).ready(function() {
    $('#discription').keyup(function() {
        var lengthCount = this.value.length;
        if (lengthCount > maxLimit) {
            this.value = this.value.substring(0, maxLimit);
            var charactersLeft = maxLimit - lengthCount + 1;
        } else {
            var charactersLeft = maxLimit - lengthCount;
        }
        $('#spnCharLefts').css('display', 'block');
        $('#spnCharLefts').text(charactersLeft + ' /500');
    });
});
</script>
<script type='text/javascript'>
$('#spnCharLeft').css('display', 'block');
var maxLimit = 500;
$(document).ready(function() {
    $('#classname').keyup(function() {
        var lengthCount = this.value.length;
        if (lengthCount > maxLimit) {
            this.value = this.value.substring(0, maxLimit);
            var charactersLeft = maxLimit - lengthCount + 1;
        } else {
            var charactersLeft = maxLimit - lengthCount;
        }
        $('#spnCharLeft').css('display', 'block');
        $('#spnCharLeft').text(charactersLeft + ' /500');
    });
});
</script>

<script>
$('ul.editdel li').click(function() {
    $(this).toggleClass('main');
    $('.innereditdel').toggle();
    console.log("Dots Clicked!!!");
});
</script>
<script>
function FileUpload() {
    document.getElementById('InputFile').click();
    FileUpload11();
}

function selectFile() {
    if (document.getElementById('InputFile').value) {
        document.getElementById('errormsg').innerHTML = document.getElementById('InputFile').value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } else {
        document.getElementById('errormsg').innerHTML = "No file chosen, yet.";
    }

}
</script>
