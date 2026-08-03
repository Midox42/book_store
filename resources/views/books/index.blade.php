<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
    }

    body {
        min-height: 100vh;
        font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
        background: #f8fafc;
        color: #1e293b;
        margin: 0;
        padding: 0;
    }

    @media (prefers-color-scheme: dark) {
        body {
            background: #0f172a;
            color: #f1f5f9;
        }
    }

    .page-shell {
        position: relative;
        padding: 2rem 1rem;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border-radius: 24px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
        padding: 40px;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    @media (prefers-color-scheme: dark) {
        .container {
            background: rgba(30, 41, 59, 0.7);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    }

    h1 {
        color: inherit;
        margin-bottom: 30px;
        font-size: 2.5rem;
        font-weight: 800;
        letter-spacing: -0.025em;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    h1::after {
        content: '';
        flex-grow: 1;
        height: 1px;
        background: rgba(0,0,0,0.05);
    }

    @media (prefers-color-scheme: dark) {
        h1::after {
            background: rgba(255,255,255,0.05);
        }
    }

    .table-wrapper {
        overflow-x: auto;
        border-radius: 16px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: transparent;
    }

    thead {
        background: var(--primary-gradient);
        color: white;
    }

    th {
        padding: 1.25rem 1rem;
        text-align: left;
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    th:first-child { border-top-left-radius: 16px; }
    th:last-child { border-top-right-radius: 16px; }

    tbody tr {
        background: rgba(255, 255, 255, 0.4);
        transition: all 0.2s ease;
    }

    @media (prefers-color-scheme: dark) {
        tbody tr {
            background: rgba(15, 23, 42, 0.2);
        }
    }

    tbody tr:last-child td:first-child { border-bottom-left-radius: 16px; }
    tbody tr:last-child td:last-child { border-bottom-right-radius: 16px; }

    tbody tr:hover {
        background: rgba(255, 255, 255, 0.6);
        /* Removed transform: scale(1.002); to stop potential shifting/flickering */
    }

    @media (prefers-color-scheme: dark) {
        tbody tr:hover {
            background: rgba(15, 23, 42, 0.4);
        }
    }

    td {
        padding: 1.25rem 1rem;
        color: inherit;
        font-size: 0.95rem;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }

    @media (prefers-color-scheme: dark) {
        td {
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
    }

    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    .btn {
        padding: 8px 14px;
        border: none;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-view {
        background-color: #10b981;
        color: white;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-view:hover {
        background-color: #059669;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        color: white;
    }

    .btn-edit {
        background-color: #667eea;
        color: white;
    }

    .btn-edit:hover {
        background-color: #5568d3;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .btn-delete {
        background-color: #ef4444;
        color: white;
    }

    .btn-delete:hover {
        background-color: #dc2626;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
    }

    .btn-view {
        background-color: #10b981;
        color: white;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-view:hover {
        background-color: #059669;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .modal-content {
        background-color: white;
        margin: 10% auto;
        padding: 30px;
        border-radius: 12px;
        width: 90%;
        max-width: 500px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from { transform: translateY(-50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .modal-header {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #333;
    }

    .modal-body {
        margin-bottom: 20px;
        color: #555;
        line-height: 1.6;
    }

    .modal-body p {
        margin-bottom: 10px;
    }

    .modal-footer {
        text-align: right;
        display: flex;
        gap: 10px;
        justify-content: flex-end;
    }

    .btn {
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 8px;
        font-size: 0.8125rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .btn-view {
        background: #10b981;
        color: white;
    }

    .btn-view:hover {
        background: #059669;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
    }

    .btn-edit {
        background: #6366f1;
        color: white;
    }

    .btn-edit:hover {
        background: #4f46e5;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
    }

    .btn-delete {
        background: #ef4444;
        color: white;
    }

    .btn-delete:hover {
        background: #dc2626;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
    }

    .btn-create {
        background-color: #8b5cf6;
        color: white;
    }

    .btn-create:hover {
        background-color: #7c3aed;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(139, 92, 246, 0.4);
        color: white;
    }

    .form-container {
        background: rgba(255, 255, 255, 0.5);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
        border: 1px solid rgba(255, 255, 255, 0.5);
    }

    @media (prefers-color-scheme: dark) {
        .form-container {
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    }

    .form-control {
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(0,0,0,0.1);
        border-radius: 8px;
    }

    .edit-modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.4);
    }
</style>

<script src="https://unpkg.com/feather-icons"></script>

@include('components.layout')

<div class="page-shell">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0" style="flex: 1;"><i data-feather="layout"></i> Posts Management</h1>
        </div>

        {{-- Edit Modal --}}
        <div id="editModal" class="edit-modal">
            <div class="modal-content">
                <h4 class="mb-3">Edit Post</h4>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title" id="editTitle" required placeholder="Title">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="created_by" id="editCreatedBy" required placeholder="Created By">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="description" id="editDescription" placeholder="Description"></textarea>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Cancel</button>
                        <button type="submit" class="btn btn-edit">Update</button>
                    </div>
                </form>
            </div>
        </div>

        

        <div class="form-container">
            <h4 class="mb-3"><i data-feather="filter"></i> Filter Posts</h4>
            <form action="{{ route('posts') }}" method="GET" class="row g-3">
                <div class="col-md-11">
                    <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search by title, description, or creator...">
                </div>
                <div class="col-md-1 d-flex gap-2">
                    <button type="submit" class="btn btn-edit w-100" title="Filter"><i data-feather="search" style="width: 14px; height: 14px;"></i></button>
                    @if(request('search'))
                        <a href="{{ route('posts') }}" class="btn btn-delete w-100" title="Reset"><i data-feather="x" style="width: 14px; height: 14px;"></i></a>
                    @endif
                </div>
            </form>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th style="width: 22%;">Title</th>
                        <th style="width: 38%;">Description</th>
                        <th style="width: 15%;">Created By</th>
                        <th style="width: 20%; text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><span class="badge bg-secondary opacity-75">#{{ $post->id }}</span></td>
                            <td class="fw-semibold">{{ $post->title }}</td>
                            <td class="" style="word-break: break-word; white-space: normal;">{{ $post->description }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2" style="word-break: break-word;">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center flex-shrink-0" style="width: 24px; height: 24px; font-size: 10px;">
                                        {{ strtoupper(substr($post->created_by, 0, 1)) }}
                                    </div>
                                    <span>{{ $post->created_by }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-view" title="View Post">
                                        <i data-feather="eye" style="width: 14px; height: 14px;"></i> View
                                    </a>
                                    <button type="button" class="btn btn-edit" title="Edit Post" 
                                            onclick="openEditModal('{{ $post->id }}', '{{ addslashes($post->title) }}', '{{ addslashes($post->created_by) }}', '{{ addslashes($post->description) }}')">
                                        <i data-feather="edit-2" style="width: 14px; height: 14px;"></i> Edit
                                    </button>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: contents;" 
                                          onsubmit="return confirm('Are you sure you want to delete this post?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete" title="Delete Post">
                                            <i data-feather="trash-2" style="width: 14px; height: 14px;"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-container">
            <h4 class="mb-3"><i data-feather="plus-square"></i> Create New Post</h4>
            <form action="{{ route('posts.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-4">
                    <input type="text" class="form-control" name="title" placeholder="Title" >
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="created_by" placeholder="Created By">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="description" placeholder="Description (optional)">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-create w-100">Add</button>
                </div>
                <x-error name="title" />
                <x-error name="created_by" />
                <x-error name="description" />
            </form>
        </div>
    </div>
</div>

<script>
    feather.replace();

    function openEditModal(id, title, created_by, description) {
        document.getElementById('editForm').action = '/posts/' + id;
        document.getElementById('editTitle').value = title;
        document.getElementById('editCreatedBy').value = created_by;
        document.getElementById('editDescription').value = description;
        document.getElementById('editModal').style.display = 'block';
    }

    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }
</script>

