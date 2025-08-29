<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Plus } from 'lucide-vue-next';
import { Card, CardContent } from '@/components/ui/card'
import { Badge } from '@/components/ui/badge'
import {
    BuildingIcon,
    MapPinIcon,
    ClockIcon,
    DollarSignIcon,
    BriefcaseIcon
} from 'lucide-vue-next'

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
        <div class="py-4">
            <div class="w-full mx-auto sm:px-4 lg:px-4">
                <div>
                    <div class="p-4 light:text-gray-900">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium">Meus Workspaces</h3>
                            <Link :href="route('workspaces.create')">
                            <Button>
                                <Plus class="w-5 h-5" />Novo workspace
                            </Button>
                            </Link>
                        </div>
                        <div v-if="workspaces.length > 0">
                            <div class="grid gap-6 md:grid-cols-2">
                                <Card v-for="workspace in workspaces" :key="workspace.id"
                                    class="group hover:shadow-lg transition-shadow duration-200">
                                    <CardContent class="p-6">
                                        <div class="flex flex-col h-full">
                                            <div class="flex justify-between items-start mb-4">
                                                <div>
                                                    <h3 class="text-xl font-bold mb-2">{{ workspace.name }}</h3>
                                                    <div class="flex items-center text-gray-600 mb-2">
                                                        <BuildingIcon class="h-4 w-4 mr-2" />
                                                        <span>{{ workspace.description }}</span>
                                                    </div>
                                                    <div class="flex items-center text-gray-600">
                                                        <MapPinIcon class="h-4 w-4 mr-2" />
                                                        <span>{{ workspace.slug }}</span>
                                                    </div>
                                                </div>
                                                <Badge variant="secondary">{{ workspace.slug }}</Badge>
                                            </div>

                                            <div class="flex items-center gap-4 mb-4">
                                                <div class="flex items-center text-gray-600">
                                                    <DollarSignIcon class="h-4 w-4 mr-1" />
                                                    <span>{{ workspace.slug }}</span>
                                                </div>
                                                <div class="flex items-center text-gray-600">
                                                    <ClockIcon class="h-4 w-4 mr-1" />
                                                    <span>{{ workspace.slug }}</span>
                                                </div>
                                            </div>

                                            <p class="text-gray-600 mb-4 line-clamp-2">{{ workspace.description }}</p>

                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <!-- <Badge v-for="tag in job.tags" :key="tag" variant="outline"
                                                    class="text-sm">
                                                    {{ tag }}
                                                </Badge> -->
                                            </div>

                                            <div class="mt-auto pt-4 border-t">
                                                <div class="flex justify-between items-center">
                                                    <div class="flex items-center text-gray-600">
                                                        <BriefcaseIcon class="h-4 w-4 mr-2" />
                                                        <!-- <span>{{ job.benefits.length }} benefits</span> -->
                                                    </div>
                                                    <Link :href="route('workspaces.show', workspace.slug)"><Button>Ver Detalhes</Button></Link>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </CardContent>
                                </Card>
                            </div>
                        </div>
                        <div v-else class="dark:text-gray-500">
                            Nenhum workspace encontrado. Crie um para começar!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>