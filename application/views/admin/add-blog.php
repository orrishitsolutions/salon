<?php
$errors = $this->session->flashdata();
include('include/head.php');
include('include/left-header.php');
include('include/top-header.php');
?>
<div class="page-content">
    <div class="row mb-3">
        <div class="col-md-8">
            <h6 class="card-title">
                <i data-feather="edit"></i>
                Blogs
                <?php
                $blog_id = $this->uri->segment(3);
                if (isset($blog_details)) {
                    $title = $blog_details->title;
                    $publish_date = $blog_details->publish_date;
                    $comment = $blog_details->comment;
                    $status = $blog_details->status;
                    $description = $blog_details->description;
                    $meta_title = $blog_details->meta_title;
                    $meta_description  = $blog_details->meta_description;
                    $meta_keywords  = $blog_details->meta_keywords;
                    $file  = $blog_details->file;
                    $short_description  = $blog_details->short_description;
                    $tags_data = $blog_details->tags_data;
                } else {
                    $title = '';
                    $publish_date = '';
                    $comment = '';
                    $status = '';
                    $description = '';
                    $meta_title = '';
                    $meta_description = '';
                    $meta_keywords = '';
                    $file = '';
                    $short_description = '';
                    $tags_data = '';
                }
                ?>
            </h6>
        </div>
        <div class="col-md-4">
            <div class="d-flex justify-content-space-between">
                <button type="submit" form-id="form-category" class="btn btn-primary save" id="category_submit"
                    value="Do you really want to Add/Edit Blog">
                    <i class="fa fa-save"></i>
                    Save
                </button>
                <a href="<?= base_url('admin/blog') ?>" class="btn btn-danger "><i class="fa fa-undo"></i>Back</a>
            </div>
        </div>
        <?php if (!empty($errors['status'])) : ?>
        <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
            <strong> <?= $errors['status'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
        <?php endif; ?>

        <?php if (!empty($errors['error'])) : ?>
        <div class="alert alert-fill-warning alert-dismissible fade show mt-1" role="alert">
            <strong> <?= $errors['error'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
        <?php endif; ?>

    </div>
    <div class="row mt-4">
        <div class="row align-items-start">
            <div class="col-md-12 d-flex ">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="General-tab" data-bs-toggle="tab" href="#General" role="tab"
                            aria-controls="General" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Description-tab" data-bs-toggle="tab" href="#Description" role="tab"
                            aria-controls="Description" aria-selected="false">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="SEO-tab" data-bs-toggle="tab" href="#SEO" role="tab" aria-controls="SEO"
                            aria-selected="false">SEO</a>
                    </li>

                </ul>
            </div>
        </div>
        <?PHP if (isset($blog_id)) {
        ?>
        <form action="<?= base_url('admin/UpdateBlog') ?>" method="post" enctype="multipart/form-data"
            id="form-category" class="form-horizontal">
            <input type="hidden" name="id" value="<?= $blog_id ?>">
            <input type="hidden" name="del_img" value="<?= $file ?>">
            <?php
        } else {
            ?>
            <form action="<?= base_url('admin/insertBlog') ?>" method="post" enctype="multipart/form-data"
                id="form-category" class="form-horizontal">
                <?php } ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>"
                    value="<?= $this->security->get_csrf_hash(); ?>">

                <div class="tab-content border  p-3" id="myTabContent">
                    <div class="tab-pane fade active show" id="General" role="tabpanel" aria-labelledby="General-tab">
                        <div class="card-body">
                            <div class="form-group required row">
                                <label class="col-sm-2 control-label" for="input-name1"> Title Blog</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="<?= $title ?>"
                                        placeholder="Title Blog........" id="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required row">
                                <label class="col-sm-2 control-label" for="input-name1"> Publish Date </label>
                                <div class="col-sm-10">
                                    <div class="input-group date datepicker" id="<?php if(!isset($blog_id)) { echo "datePickerExample"; } ?>">
                                        <input type="text" value="<?= $publish_date ?>" class="form-control" name="publish_date">
                                        <span class="input-group-text input-group-addon">
                                            <i data-feather="calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required row">
                                <label class="col-sm-2 control-label" for="input-name1"> Tags Clouds </label>
                                <div class="col-sm-10 ">
                                    <input type="text" name="tags_data" value="<?= $tags_data ?>" placeholder="Tags Clouds .....( uning | to next Tags)" id="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label class="col-sm-2 control-label" for="input-name1">Comments</label>
                                <div class="col-sm-10">
                                    <input type="number" name="comment" value="<?= $comment ?>" placeholder="Comments "
                                        id="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label class="col-sm-2 control-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea name="short_description" rows="5" placeholder="Short Description"
                                        class="form-control">
                                        <?= $short_description ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="input-status">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" id="input-status" class="js-example-basic-single form-select">
                                        <option class="text-success" value="1" <?php if ($status == 1) {
                                                                                    echo 'selected';
                                                                                } ?>>Enabled</option>
                                        <option class="text-danger" value="0" <?php if ($status == 0) {
                                                                                    echo 'selected';
                                                                                } ?>>Disabled</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-10">
                                <img onclick="document.getElementById('profile').click();" id="profileImg" src="<?= base_url() ?>assets\frontend\upload/blog-image/<?php if ($file !== '') { echo $file;} else { echo "placeholder.png";   } ?>">
                                <input type="file" name="file" class="d-none" id="profile">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label" for="input-description1">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="content" rows="10">
                                 <?= $description ?>
                        </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="SEO" role="tabpanel" aria-labelledby="SEO-tab">
                        <div class="form-group row ">
                            <label class="col-sm-3 control-label" for="input-meta-title1">Meta Tag Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="meta_title" value="<?= $meta_title ?>"
                                    placeholder="Meta Tag Title" id="meta_title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label" for="input-meta-description1">Meta Tag
                                Description</label>
                            <div class="col-sm-9">
                                <textarea name="meta_description" rows="5" placeholder="Meta Tag Description"  id="input-meta-description1" class="form-control"> <?= $meta_description ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label" for="input-meta-keyword1">Meta Tag Keywords</label>
                            <div class="col-sm-9">
                                <textarea name="meta_keywords" rows="5" placeholder="Meta Tag Keywords"
                                    id="input-meta-keyword1" class="form-control"><?= $meta_keywords ?></textarea>
                            </div>
                        </div>
                    

                    </div>


                </div>
            </form>
    </div>
</div>
<?php
include('include/footer.php');
?>

<style type="text/css">
#profileImg {
    width: 135px;
    height: 107px;
}

.form-group {
    margin-top: 10px;
}

.save {
    margin-right: 10px;
    margin-left: 150px
}
</style>
