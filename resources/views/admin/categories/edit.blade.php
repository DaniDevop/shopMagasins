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
                  <h4 class="card-title">Modifier la catégorie :{{$categorie->categories}}</h4>
                  <p class="card-description">
                  </p>
                  <div class="table-responsive pt-3">
                    <form method="POST" action="{{route('categories.update')}}">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Categories</label>
                          <input type="text" name="categorie" value="{{$categorie->categories}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Status</label>
                          <select class="form-control" name="status" aria-label="Disabled select example">
                            <option value="{{$categorie->status}}">{{$categorie->status}}</option>
                            <option value="Disponible">Disponible</option>
                            <option value="Indisponible">Indisponible</option>
                          </select>
                        </div>
                        <input type="hidden" name="id" value="{{$categorie->id}}">


                        <button type="submit" class="btn btn-primary">Modifier</button>
                      </form>
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




      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
    @include('admin.pages.js')
</body>

</html>
