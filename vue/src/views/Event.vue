<template>
  <div class="fluid-container p-5">
    <div class="fluid-container">
      <div class="row">
        <div class="col-auto me-auto">
            <h1>Event</h1>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle"></i> Add Event
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
                            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                           <form action="">
                            <div class="form-group">
                                <label for="title">Event Title</label>
                                <input type="text" class="form-control" id="title">
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" rows="3"></textarea>
                            </div>
                           </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>  
    </div>
    <div class="fluid-container mt-5">
        <div class="card mb-3 w-100" >
            <div class="row no-gutters" >
                <div class="col-md-2" >
                    <img src="../assets/logos/clsu-logo.png" class="card-img" alt="img" >
                </div>
                <div class="col">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <h5 class="card-title">Card title</h5>
                            </div>
                            <div class="col-auto">
                                <div class="row">
                                    <div class="col">
                                    <p>25-02-2023</p>
                                    </div>
                                    <div class="col-4">
                                    
                                        <button id="action" type="button" class="btn" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="action">
                                            <a class="dropdown-item" href="#" @click="edit"><i class="bi bi-pencil-square"></i> Edit</a>
                                            <a class="dropdown-item" href="#" @click="del"><i class="bi bi-trash"></i> Delete</a>
                                            <a class="dropdown-item" href="#" @click="cancel"><i class="bi bi-x-lg"></i> Cancel</a>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="mt-5 d-flex justify-content-end">
                            <div class="col-auto">
                                <button type="button" class="btn btn-light border">
                                    <i class="bi bi-file-earmark-plus"></i> Register
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>