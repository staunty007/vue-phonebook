<template>
	<div class="modal fade is-active" id="openUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Update {{ list.name }} Phonebook</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form>
	          <div class="form-group">
	            <label for="name">Name</label>
	            <input type="text" class="form-control" :class="{'is-invalid':errors.name}" placeholder="Name" v-model="list.name">
	            <small class="form-text text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
	          </div>
	          <div class="form-group">
	            <label for="phone">Phone</label>
	            <input type="text" class="form-control" :class="{'is-invalid':errors.phone}" placeholder="Phone" v-model="list.phone">
	            <small class="form-text text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
	          </div>
	          <div class="form-group">
	            <label for="phone">Email</label>
	            <input type="email" class="form-control" :class="{'is-invalid':errors.email}" placeholder="Email" v-model="list.email">
	            <small class="form-text text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
	          </div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" @click="update" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
</template>

<script>
	export default {
		data(){
			return {
				list: {},
				errors:{}
			}
		},
		methods:{
			update(){
				axios.patch(`/phonebook/${this.list.id}`,this.$data.list)
                .then((response) => {
                	// console.log(response),
                	$("#openUpdate").modal("hide"),
                	swal({
                	  position: 'center',
                	  type: 'success',
                	  title: 'Phonebook Updated',
                	  showConfirmButton: false,
                	  timer: 2000
                	})
                })
				  .catch((error) => this.errors = error.response.data.errors)
			}	
		}
	}

</script>
