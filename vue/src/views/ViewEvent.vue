<template>
  <div class="fluid-container p-5">
    <div class="fluid-container">
        <div class="row">
            <div class="col-auto me-auto">
                <h1>Event Title</h1>
                <div class="col border rounded p-2 d-flex align-items-center bg-light">
                    STATUS: Pending
                </div>
            </div>
            <div class="col-auto">
                <p>25-02-2023</p>
            </div>
          </div>  
        </div>
        <div class="fluid-container">
            <div class="mt-3">
                <p align="justify"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi impedit, blanditiis neque tempora beatae reprehenderit cupiditate molestiae aut similique non, alias ipsum dicta perferendis! Accusantium officia consequatur amet modi blanditiis!
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum repellendus officia officiis ea, minima cupiditate totam. 
                Porro voluptatibus quos ipsa magnam ab tenetur, aut, itaque corrupti, nulla voluptates provident dolores.</p>
            </div>
            <div class="d-flex justify-content-end">
                <div class="col-auto">          
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Cancel Event
                    </button>
                </div>
            </div>
        </div>
        <div class="fluid-container mt-4">
            <h1>Registered Students</h1>
            <div class="container text-center mt-5">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="col border justify-content-center rounded p-2 d-flex align-items-center bg-light">
                            Total: 0
                        </div>
                    </div>
                    <div class="col">
                        <div class="col border justify-content-center rounded p-2 d-flex align-items-center bg-light">
                            Denied: 0
                        </div>
                    </div>
                    <div class="col">
                        <div class="col border justify-content-center rounded p-2 d-flex align-items-center bg-light">
                            Approved: 0
                        </div>
                    </div>
                </div>
            </div>
            <div class="fluid-container mt-5">
                <table class="table responsive">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
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