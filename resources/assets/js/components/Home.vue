<template>
	 <div class="row justify-content-center">
  	<div class="col-8">
  		<div class="card">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-10">Task</div>
                  <div class="col-md-2">    
                      <button @click="openAdd"
                      class="btn btn-primary btn-xs pull-right">
                          <i class="fa fa-plus"></i> Add New Task
                      <span v-if="loading">
                        <i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>
                      </span>
                      </button>
                  </div>

              </div>
              
            </div>
            <div class="card-body">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1" v-model="searchQuery">
              </div>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Modify</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="item,key in temp">
                    <th scope="row">{{ item.id }}</th>
                    <td>{{ item.name }}</td>
                    <td>{{ item.phone }}</td>
                    <td>{{ item.email }}</td>
                    <td>
                    	<a href="" class="btn btn-warning" @click.prevent="openUpdate(key)"><i class="fa fa-pencil"></i></a>
                    	<a href="" class="btn btn-danger" @click.prevent="del(key,item.id)"><i class="fa fa-trash"></i></a>
                      <a href="" class="btn btn-info" @click.prevent="openShow(key)"><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

  	</div>
    <Add></Add>
    <Show></Show>
    <Update></Update>
	</div>
</template>

<script>
    let Add = require('./Add.vue');
    let Show = require('./Show.vue');
    let Update = require('./Update.vue');

  export default {
    components: {Add,Show,Update},
    data() {
      return {
        lists:{},
        errors:{},
        loading: false,
        searchQuery:'',
        temp:''
      }
    },
    watch: {
        searchQuery() {
          if (this.searchQuery.length > 0) {
            this.temp = this.lists.filter((item) => {

              return Object.keys(item).some((key)=>{
                let string = String(item[key])
                  return string.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
                  // console.log(string)
              })

            });
            // console.log(result)
          }else {
            this.temp = this.lists
          }
        }
    },
    mounted(){
      axios.post('/getData')
      .then((response) => this.lists = this.temp = response.data)
           .catch((error) => this.errors = error.response.data.errors)
    },
    methods: {
      openAdd() {
         $("#openAdd").modal("show");
      },
      openShow(key) {
        this.$children[1].list = this.temp[key],
         $("#openShow").modal("show");
      },
      openUpdate(key) {
        this.$children[2].list = this.temp[key],
         $("#openUpdate").modal("show");
      },
      del(key,id) {

        swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            swal(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            ),
            this.loading = !this.loading
            axios.delete(`/phonebook/${id}`)
            .then((response) => {this.lists.splice(key,1);this.loading = !this.loading})
              .catch((error) => this.errors = error.response.data.errors)
          }
        })
        
        // if (confirm("Are you Sure")) {
        //   this.loading = !this.loading
        //   axios.delete(`/phonebook/${id}`)
        //   .then((response) => {this.lists.splice(key,1);this.loading = !this.loading})
        //     .catch((error) => this.errors = error.response.data.errors)
        // }



        console.log(`${key} ${id}`)
      }
    }
  }

</script> 