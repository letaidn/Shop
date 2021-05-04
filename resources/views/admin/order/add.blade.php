@extends('admin.layout.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Thêm sản phẩm</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="@Url.Action("AdminIndex","Admin")">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="@Url.Action("AdminIndexProduct","Admin")">Danh sách sản phẩm</a></li>
                <li class="breadcrumb-item active">Thêm sản phẩm</li>
            </ol>
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Thêm sản phẩm
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @using (Html.BeginForm("AdminAddProduct", "Admin", FormMethod.Post, new { @class = "form", enctype = "multipart/form-data" }))
                        {
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Tên sản phẩm</label>
                                @Html.TextBoxFor(x => x.ProductName, new { @class = "form-control py-4" })
                            </div>
                            <div class="form-group" >
                                <label class="small mb-1" for="inputEmailAddress">Hình ảnh</label>
                                <input type="file" class="form-control" name="Image" id="Image"  />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">SKU</label>
                                @Html.TextBoxFor(x => x.ProductSKU, new { @class = "form-control py-4" })
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Số lượng</label>
                                @Html.TextBoxFor(x => x.ProductStock, new { @class = "form-control py-4" ,type="number"})
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Đơn giá</label>
                                @Html.TextBoxFor(x => x.ProductPrice, new { @class = "form-control py-4", type = "number" })
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Phân loại</label>
                                @Html.DropDownListFor(x => x.CategoryID,
                               new SelectList(ViewBag.Categories, "CategoryID", "CategoryName"),
                               new { @class = "form-control", type = "number" })
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Kích cở</label>
                                @Html.DropDownListFor(x => x.SizeID,
                               new SelectList(ViewBag.Sizes, "SizeID", "SizeType"),
                               new { @class = "form-control", type = "number" })
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Mô tả ngắn gọn</label>
                                @Html.TextAreaFor(x => x.ProductShortDesc, new { @class = "form-control py-4" })
                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Mô tả</label>
                                @Html.TextAreaFor(x => x.ProductLongDesc, new { @class = "form-control py-4" })
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        }
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2020</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection