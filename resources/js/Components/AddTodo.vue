<template>
    <div class="card">
        <div v-if="!submitted" class="flex">
            <div class="form-group">
                <label class="m-2" for="description">Desctiption:</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    required
                    v-model="todo.description"
                    name="description"
                />
            </div>
            <input class="m-3"
                   type="checkbox"
                   v-model="todo.state"
                   id="state"
                   true-value="done"
                   false-value="todo"
                   name="state"/>
            <label class="m-3" for="state">Done</label>

            <button @click="addTodo" class="m-auto mr-2 btn btn-success">Submit</button>
        </div>

        <div v-else class="flex">
            <h4>Todo is added successfully!</h4>
            <button class="m-auto mr-2 btn btn-success" @click="newTodo">Add more...</button>
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
            TodoDataService.create(this.todo)
                .then(response => {
                    this.todo = response.data;
                    this.todo.project_id = response.data.projectId;
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
                state: "todo",
            };
        }
    },
}
</script>

<style scoped>

</style>
