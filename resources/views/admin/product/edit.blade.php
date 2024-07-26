<!DOCTYPE html>
<html lang="en">

@include('admin.pages.head')

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
   @include('admin.pages.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <!-- partial:../../partials/_sidebar.html -->
      @include('admin.pages.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">LModification du produit</h4>
                  <p class="card-description">
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">+Modifier-un-Produit</button>
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                            <th>
                              #
                            </th>
                            <th>
                              Image
                            </th>

                            <th>
                                Categorie
                              </th>
                            <th>
                              Designation
                            </th>
                            <th>
                              Prix
                            </th>
                            <th>
                                Quantité
                              </th>
                            <th>
                              Date-d'ajout
                            </th>
                          </tr>
                      </thead>
                      <tbody>

                        <tr>
                          <td>
                           {{$product->id}}
                          </td>
                          <td>
                            <img src="{{asset('uploads/products/'.$product->image)}}" alt="">
                        </td>
                        <td>
                            {{optional($product->categorie)->categories}}
                        </td>
                        <td>
                              {{$product->designation}}

                            </td>
                            <td>
                              {{$product->prix}} <span>FCFA</span>

                          </td>
                          <td>
                            {{$product->stock}}

                        </td>
                          <td>
                            {{$product->created_at}}
                        </td>
                        </tr>
                      </tbody>
                    </table>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                  </div>
                </div>

              </div>
            </div>


          </div>
        </div>



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="exampleModalLabel">Modifier le Produit</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('product.update')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nom-du-Produit</label>
                  <input type="text" name="designation" value="{{$product->designation}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Prix-de-vente</label>
                    <input type="number" name="prix" value="{{$product->prix}}" class="form-control">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Stock</label>
                    <input type="number" name="stock" value="{{$product->stock}}" class="form-control">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                  </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Categorie</label>
                  <select class="form-select"  name="categorie_id">
                    <option value="{{$product->categorie_id}}">  {{optional($product->categorie)->categories}}                    </option>
                    @foreach ($categoriesAll as $categorie )
                    <option value="{{$categorie->id}}">{{$categorie->categories}}</option>
                    @endforeach
                  </select>
                </div>

                <input type="hidden" value="{{$product->id}}" name="id">

                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
    @include('admin.pages.js')
</body>

</html>
