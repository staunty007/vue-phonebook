<template>
	<div class="modal fade is-active" id="openAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Phonebook</h5>
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
	        <button type="button" @click="save" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
</template>

<script>
	export default {
		data(){
			return {
				list: {
					name: '',
					phone: '',
					email: ''
				},
				errors:{}
			}
		},
		methods:{
			save(){
				axios.post('/phonebook',{
                    name: this.list.name,
                    phone: this.list.phone,
                    email: this.list.email,
                })
                .then((response) => {
                	$("#openAdd").modal("hide"),
                	this.$parent.lists.push(response.data),
                	this.list = "",
                	this.errors = ""
                	swal({
                	  position: 'center',
                	  type: 'success',
                	  title: 'Phonebook Added',
                	  showConfirmButton: false,
                	  timer: 2000
                	})
                })
				  .catch((error) => this.errors = error.response.data.errors)
			}	
		}
	}

</script>
