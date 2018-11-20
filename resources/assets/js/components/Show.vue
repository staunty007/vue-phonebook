<template>
	<div class="modal fade is-active" id="openShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">{{ list.name }} Phonebook</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <ul class="list-group">
	          <li class="list-group-item d-flex justify-content-between align-items-center">
	            {{ list.name }}
	            <span class="badge badge-primary badge-pill">NAME</span>
	          </li>
	          <li class="list-group-item d-flex justify-content-between align-items-center">
	            {{ list.phone }}
	            <span class="badge badge-primary badge-pill">PHONE</span>
	          </li>
	          <li class="list-group-item d-flex justify-content-between align-items-center">
	            {{ list.email }}
	            <span class="badge badge-primary badge-pill">EMAIL</span>
	          </li>
	        </ul>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				list:''
			}
		}
		
	}

</script>
