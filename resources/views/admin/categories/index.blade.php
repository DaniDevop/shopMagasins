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
                  <h4 class="card-title">Listes des categories</h4>
                  <p class="card-description">
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">+Ajouter-une-categorie</button>
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Nom
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Date-ajout
                          </th>
                          <th>
                            Details
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($categorieAll as $categorie )

                        <tr>
                          <td>
                           {{$categorie->id}}
                          </td>
                          <td>
                            {{$categorie->categories}}


                        </td>
                        <td>
                              {{$categorie->status}}

                            </td>
                            <td>
                              {{$categorie->created_at}}

                          </td>
                          <td>
                           <a href="{{route('categories.edit',['id'=>$categorie->id])}}" class="btn btn-success"> <i class="bi bi-pencil-fill"></i></a>
                        </td>
                        </tr>
                        @endforeach
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
          <h4 class="modal-title fs-5" id="exampleModalLabel">Ajouter-une-categorie</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('categories.ajouter')}}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Categories</label>
                  <input type="text" name="categorie" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Status</label>
                  <select class="form-select" name="status" aria-label="Disabled select example">
                    <option value="Disponible">Disponible</option>
                    <option value="Indisponible">Indisponible</option>
                  </select>
                </div>

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
