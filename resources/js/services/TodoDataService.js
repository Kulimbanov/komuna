import http from "../http-common";

class TodoDataService {
    getAll() {
        return http.get("/todo");
    }

    create(data) {
        return http.post(`/project/${data.project_id}/todo`, data);
    }

    update(data) {
        return http.put(`/project/${data.project_id}/todo/${data.id}`, data);
    }

    delete(id) {
        return http.delete(`/todo/${id}`);
    }

    getProjectTodos(projectId) {
        return http.get(`/project/${projectId}/todo`)
    }

    createTodo(projectId, data) {
        return http.post(`/todo/${projectId}`, data)
    }

    updateTodo(projectId, data) {
        return http.put(`/todo/${projectId}/`, data)
    }
}

export default new TodoDataService();
