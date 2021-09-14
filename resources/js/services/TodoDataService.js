import http from "../http-common";

class TodoDataService {
    getProjectTodos(projectId) {
        return http.get(`/project/${projectId}/todo`)
    }

    create(data) {
        return http.post(`/project/${data.project_id}/todo`, data);
    }

    update(data) {
        return http.put(`/project/${data.project_id}/todo/${data.id}`, data);
    }
}

export default new TodoDataService();
