<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Workspaces',
        href: '/workspaces',
    },
];

defineProps({
    workspaces: Array,
});
</script>

<template>
    <Head title="Workspaces" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="py-12">
            <div class="w-full mx-auto sm:px-6 lg:px-8">
                <div class="dark:bg-neutral-900 shadow-md sm:rounded-lg">
                    <div class="p-6 light:text-gray-900">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium">Meus Workspaces</h3>
                            <Button variant="destructive">
                                <button type="submit">Delete account</button>
                            </Button>
                        </div>

                        <div v-if="workspaces.length > 0">
                            <ul class="divide-y divide-gray-200">
                                <li v-for="workspace in workspaces" :key="workspace.id" class="py-4 flex justify-between items-center">
                                    <div>
                                        <h4 class="text-xl font-semibold">{{ workspace.name }}</h4>
                                        <p class="text-gray-600">{{ workspace.description }}</p>
                                    </div>
                                    <div>
                                        <Link :href="route('workspaces.show', workspace.slug)" class="text-blue-600 hover:text-blue-900 mr-4">Ver</Link>
                                        <Link :href="route('workspaces.edit', workspace.slug)" class="text-yellow-600 hover:text-yellow-900">Editar</Link>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div v-else class="text-gray-600">
                            Nenhum workspace encontrado. Crie um para começar!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>