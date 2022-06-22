<template>
    <div>
        <h3 class="text-center">Edit Todo</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateTodo">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="todo.name">
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="todo.priority">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="todo.description">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                todo: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/${this.$route.params.id}/showTodo`)
                .then((res) => {
                    this.todo = res.data;
                });
        },
        methods: {
            updateProduct() {
                this.axios
                    .patch(`http://localhost:8000/api/${this.$route.params.id}/updateTodo`, this.todo)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>
