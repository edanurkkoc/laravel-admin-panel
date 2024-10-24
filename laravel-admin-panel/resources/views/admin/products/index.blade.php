@extends ('layouts.admin.panel')
@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                     <div class="row">
                        <div class="col-6">
                        <h1 class="h3 mb-2 text-gray-800">Ürünler</h1>
                        <p class="mb-4">Bu sayfada ürünlerin  listesi bulunmaktadır.</p>
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-end">
                            <a href="{{route('admin.products.create')}}" class="btn btn-primary">Ürün Ekle</a>
                        </div>
                     </div>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ürün Listesi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Ad</th>
                                            <th>EMail</th>
                                            <th>İndirimli Fiyat</th>
                                            <th>Stok Adedi</th>
                                            <th>Oluşturulma Tarihi</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>

                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Ad</th>
                                            <th>EMail</th>
                                            <th>İndirimli Fiyat</th>
                                            <th>Stok Adedi</th>
                                            <th>Oluşturulma Tarihi</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>


                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($products as $product )
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->discount_price}}</td>
                                            <td>{{$product->stock_qty}}</td>
                                            <td>{{$product->created_at->format('d/m/Y H:i:s')}}</td>
                                            
                                            <td>
                                                <a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-primary">Düzenle</a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.products.destroy',$product->id)}}" class="btn btn-danger">Sil</a>
                                            </td>
                                            
                                          
                                        </tr>
                                        @endforeach
                                  
                                    </tbody>
                                </table>
                            </div>
                            {{$products->links()}}
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
@endsection