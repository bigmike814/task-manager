<script lang="ts">
    import { onMount } from 'svelte';
    import TaskForm from './TaskForm.svelte';

    interface Task {
        id: number;
        title: string;
        description: string;
    }

    let tasks: Task[] = [];

    async function fetchTasks() {
        const response = await fetch('/api/tasks');
        tasks = await response.json();
    }

    onMount(fetchTasks);

    async function deleteTask(id: number) {
        await fetch(`/api/tasks/${id}`, { method: 'DELETE' });
        fetchTasks();
    }
</script>

<TaskForm on:taskAdded={fetchTasks} />

<ul>
    {#each tasks as task}
        <li>
            {task.title}
            <button on:click={() => deleteTask(task.id)}>Delete</button>
        </li>
    {/each}
</ul>
