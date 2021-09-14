<template>
    <div class="flex" :key="project.id">
        <div v-if="!editing" class="col-6 p-2" @click="showProjectTodos">
            <a href="#" class="text-2xl text-blue-900">{{ project.name }}</a>
        </div>
        <div v-if="editing" class="col-6">
            <div class="form-group">
                <input type="text" class="form-control" :id="project.id" v-model="project.name"/>
            </div>
        </div>
        <span v-if="!editing" class="mr-2 m-auto p-2 btn btn-info" @click="edit">Edit</span>
        <span v-if="editing" class="mr-2 m-auto p-2 btn btn-info" @click="updateProject">Update</span>
        <span v-if="!editing" class="mx-2 m-auto p-2 btn btn-danger" @click="deleteProject">Delete</span>
    </div>
</template>

<script>

import Button from "@/Components/Button";
import Input from "@/Components/Input";

export default {
    name: "Project",
    components: {Input, Button},
    props: {
        project: {
            id: 0,
            userId: 0,
            name: ''
        }
    },
    data() {
        return {
            editing: false,
        }
    },
    methods: {
        edit() {
            this.editing = true;
        },
        updateProject() {
            this.$emit('updateProject', this.project);
            this.editing = false;
        },
        deleteProject() {
            //call prompt
            this.$emit('deleteProject', this.project.id);
        },
        showProjectTodos() {
            this.$emit('showProjectTodos', this.project.id);
        },
    }
}
</script>

<style scoped>

</style>
