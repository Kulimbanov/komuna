# Scito Performance assessment

The goal of this assessment is to build an API in Laravel. The application is a simple Todo
list. In this todo application you can have projects and each project is attached to 1 user.
Todos can be marked as done and can be deleted.
These are the specifications for the Todo application:

## Project
    * A user can create a project
        * A project has a name
        * A project can have multiple todos

## Todo
    * A user can create a tado
        * A todo has a description
        * A todo has 2 states: todo and done. Default state is todo
        * A todo always belongs to a project
        * A todo can only be seen by 1 user
    * A todo can be marked as done
    * A todo can be deleted
    * There is a list of todos a user can request
