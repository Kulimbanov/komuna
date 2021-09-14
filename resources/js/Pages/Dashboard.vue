<template>
    <Head title="Dashboard"/>

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" v-if="!loading">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" v-if="!activeProject">

                    <div class="p-6 bg-white border-b border-gray-200">
                        <AddProject :userId="$page.props.auth.user.id" @reloadProjects="readProjects"></AddProject>
                    </div>

                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3>Projects</h3>
                        <project v-for="project in projects"
                                 :project="project"
                                 @updateProject="updateProject"
                                 @deleteProject="deleteProject"
                                 @showProjectTodos="showProjectTodos"
                        />
                    </div>

                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" v-if="activeProject">
                    <div class="flex p-3">
                        <h2 class="text-2xl text-blue-900">Project: {{ activeProject.name }}</h2>
                        <a class="m-auto mr-0" href="#" @click="showProjects">back</a>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <todo v-for="todo in activeProject.todos" :key="todo.id" :todo="todo"/>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <AddTodo :projectId="activeProject.id"
                                 @addNewTodo="addNewTodo"></AddTodo>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import {Head} from '@inertiajs/inertia-vue3';
import {usePage} from '@inertiajs/inertia-vue3'

import AddProject from "@/Components/AddProject";
import Project from "@/Components/Project";
import AddTodo from "@/Components/AddTodo";
import Todo from "@/Components/Todo";

import ProjectDataService from "@/services/ProjectDataService";
import TodoDataService from "@/services/TodoDataService";

export default {
    components: {
        Project,
        AddProject,
        Todo,
        AddTodo,
        BreezeAuthenticatedLayout,
        Head,
    },
    data() {
        return {
            loading: true,
            projects: null,
            activeProject: null,
        }
    },
    methods: {
        readProjects() {
            // axios.get('/sanctum/csrf-cookie').then(response => {
            //     console.log(response.data);
            //     axios.post('/login', this.formData).then(response => {
            //         console.log('User signed in!');

            ProjectDataService.getAll(usePage().props.value.auth.user.id)
                .then((response) => {
                    this.projects = response.data;
                    console.log(response.data);
                    this.loading = false;
                })
                .catch(e => {
                    console.log(e);
                });
            //     }).catch(error => console.log(error)); // credentials didn't match
            // });
        },
        updateProject(project) {
            console.log('updateProject');
            ProjectDataService.update(project.id, project)
                .then((response) => {
                    this.readProjects();
                })
                .catch(e => {
                    console.log(e);
                });
        },
        deleteProject(projectId) {
            ProjectDataService.delete(projectId)
                .then((response) => {
                    this.readProjects();
                })
                .catch(e => {
                    console.log(e);
                });
        },
        showProjectTodos(projectId) {
            this.activeProject = this.projects.find(p => p.id === projectId);
            TodoDataService.getProjectTodos(projectId)
                .then((response) => {
                    this.activeProject.todos = response.data;
                    console.log(response.data);
                })
                .catch(e => {
                    console.log(e);
                });
        },
        showProjects() {
            this.activeProject = null;
        },
        addNewTodo(todo) {
            console.log(todo);
            console.log(this.activeProject.todos);
            this.activeProject.todos.push(todo);
        }


    },
    created() {
        this.readProjects();
    }
}
</script>
