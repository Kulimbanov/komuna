<template>
    <div class="card">
        <div v-if="!submitted">
            <div class="form-group">
                <label for="description">Desctiption:</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    required
                    v-model="todo.description"
                    name="description"
                />
            </div>
            <input type="radio" v-model="todo.state" id="state" name="state" value="done"/>
            <label for="state">Done</label>
            <br>

            <button @click="addTodo" class="btn btn-success">Submit</button>
        </div>

        <div v-else>
            <h4>Todo is added successfully!</h4>
            <button class="btn btn-success" @click="newTodo">Add more...</button>
        </div>
    </div>
</template>

<script>
import Input from "@/Components/Input";
import Button from "@/Components/Button";
import TodoDataService from "@/services/TodoDataService";

export default {
    name: "AddTodo",
    components: {Button, Input},
    props: {
        projectId: 0
    },
    data() {
        return {
            submitted: false,
            todo: {
                id: null,
                project_id: this.projectId,
                description: "",
                state: "todo",
            }
        }
    },
    methods: {
        addTodo() {
            console.log(this.todo);
            TodoDataService.create(this.todo)
                .then(response => {
                    this.todo = response.data;
                    console.log(response.data);
                    this.$emit('addNewTodo', this.todo);
                    this.submitted = true;
                })
                .catch(e => {
                    console.log(e);
                });
        },
        newTodo() {
            this.submitted = false;
            this.todo = {
                id: null,
                project_id: this.projectId,
                description: "",
                status: "todo",
            };
        }
    },
}
</script>

<style scoped>

</style>
