<script lang="ts">
    let title = '';
    let description = '';
    <script lang="ts">
    import { createEventDispatcher } from 'svelte';

    const dispatch = createEventDispatcher();
    let title: string = '';
    let description: string = '';

    function addTask() {
        fetch('/api/tasks', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ title, description }),
        }).then(() => {
            title = '';
            description = '';
            dispatch('taskAdded');
        });
    }
</script>

<form on:submit|preventDefault={addTask}>
    <input bind:value={title} placeholder="Task Title" required />
    <textarea bind:value={description} placeholder="Description"></textarea>
    <button type="submit">Add Task</button>
</form>
