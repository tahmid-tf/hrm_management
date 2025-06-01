@csrf

<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" value="{{ old('title', $notice->title ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="5"
              required>{{ old('description', $notice->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Visible To Roles</label>
    @php
        $roles = ['admin', 'hr', 'manager', 'employee'];
        $selectedRoles = old('visible_to_roles', $notice->visible_to_roles ?? []);
    @endphp
    @foreach($roles as $role)
        <div class="form-check form-check-inline">
            <input type="checkbox" name="visible_to_roles[]" value="{{ $role }}"
                   class="form-check-input"

            @if(!is_array($selectedRoles)) {{ in_array($role, json_decode($selectedRoles)) ? 'checked' : '' }} @endif

            >
            <label class="form-check-label">{{ ucfirst($role) }}</label>
        </div>
    @endforeach
</div>


<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control" required>
        <option value="draft" {{ (old('status', $notice->status ?? '') == 'draft') ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ (old('status', $notice->status ?? '') == 'published') ? 'selected' : '' }}>
            Published
        </option>
    </select>
</div>

<button class="btn btn-success">Save</button>
