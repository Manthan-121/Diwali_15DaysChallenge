<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 5%;
            padding: 2rem;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #1d4ed8;
            font-weight: 700;
        }
        .task-input {
            border-radius: 0.5rem;
            padding: 0.75rem;
            font-size: 1rem;
        }
        .btn-primary {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
            font-size: 0.95rem;
        }
        .btn-primary:hover {
            background-color: #1b3fb6;
            border-color: #1b3fb6;
        }
        .completed-task {
            text-decoration: line-through;
            color: #6c757d;
        }
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 1rem;
            transition: background-color 0.2s ease;
            border: none;
            border-bottom: 1px solid #e2e8f0;
        }
        .list-group-item:hover {
            background-color: #f7fafc;
        }
        .btn-success, .btn-danger {
            border-radius: 0.5rem;
        }
        .btn-success:hover {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-danger:hover {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .icon {
            font-size: 0.9rem;
        }
        .empty-message {
            color: #6c757d;
            font-style: italic;
            text-align: center;
            padding: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">To-Do List <i class="fas fa-tasks"></i></h1>
        <p class="text-center text-muted mb-4">Stay organized, stay productive!</p>

        <!-- Form to add new to-do -->
        <form action="{{ url('/todos') }}" method="POST" class="mb-3">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="task" class="form-control task-input" placeholder="Add a new task" required>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Task</button>
            </div>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>

        <!-- Display to-do list -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-3 text-primary">Your Tasks</h5>
                @if($todos->isEmpty())
                    <div class="empty-message">You have no tasks yet. Start by adding a new one above!</div>
                @else
                    <ul class="list-group">
                        @foreach($todos as $todo)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="{{ $todo->completed ? 'completed-task' : '' }}">
                                    {{ $todo->task }}
                                </span>
                                <div class="btn-group">
                                    @if(!$todo->completed)
                                        <form action="{{ url('/todos/'.$todo->id.'/complete') }}" method="POST" class="me-1">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fas fa-check icon"></i> Complete
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ url('/todos/'.$todo->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash icon"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap and Font Awesome JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
