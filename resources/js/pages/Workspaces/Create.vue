<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import WorkspaceForm from './Partials/WorkspaceForm.vue';

interface Props {
  breadcrumbs?: BreadcrumbItem[]
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Workspaces',
        href: '/workspaces',
    },
    {
        title: 'Novo Workspace',
        href: '/workspaces/create',
    },
];

const props = defineProps<Props>()

const form = useForm<{ name: string; description?: string }>({
  name: '',
  description: ''
})

const submit = () => {
    form.post(route('workspaces.store'))
}
</script>
<template>
  <Head title="Novo Workspace" />
  <AppLayout :breadcrumbs="props.breadcrumbs">
    <WorkspaceForm :form="form" :submit="submit" submitLabel="Criar" />
  </AppLayout>
</template>