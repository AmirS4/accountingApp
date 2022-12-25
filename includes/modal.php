<!-- Add customer Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addCustomer" action="">
          <div class="mb-3 row">
            <label for="addCustomerField" class="col-md-3 form-label">Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addCustomerField" name="name" >
            </div>
          </div>
          <div class="mb-3 row">
            <label for="addNumberField" class="col-md-3 form-label">Number</label>
            <div class="col-md-9">
              <input type="number" class="form-control" id="addNumberField" name="number">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="addStatusField" class="col-md-3 form-label">Status</label>
            <div class="col-md-9">
                <select id="addStatusField" name="status">
                    <option value="1">Level 1</option>
                    <option value="2">Level 2</option>
                    <option value="3">Banned</option>
                </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="addDateField" class="col-md-3 form-label">Date</label>
            <div class="col-md-9">
              <input type="date" class="form-control" id="addDateField" name="date">
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateUser" >
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="trid" id="trid" value="">
          <div class="mb-3 row">
            <label for="nameField" class="col-md-3 form-label">Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="nameField" name="name" >
            </div>
          </div>
          <div class="mb-3 row">
            <label for="numberField" class="col-md-3 form-label">Number</label>
            <div class="col-md-9">
              <input type="number" class="form-control" id="numberField" name="number">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="statusField" class="col-md-3 form-label">Status</label>
            <div class="col-md-9">
                <select id="statusField" name="status">
                    <option value="1">Level 1</option>
                    <option value="2">Level 2</option>
                    <option value="3">Banned</option>
                </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="dateField" class="col-md-3 form-label">Date</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="dateField" name="date">
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
