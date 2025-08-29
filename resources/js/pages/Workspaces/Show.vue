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

interface Workspace {
  id: number
  name: string
  slug: string
  description?: string
  created_at: string
  updated_at: string
}

interface Props {
  workspace: Workspace
}

const props = defineProps<Props>()

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Workspaces',
        href: '/workspaces',
    },
    {
        title: props.workspace.name,
        href: `/workspaces/${props.workspace.slug}`
    }
];

</script>

<template>

    <Head :title="props.workspace.name" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="py-4">
            <div class="w-full mx-auto sm:px-4 lg:px-4">
                <div>
                    <div class="p-4 light:text-gray-900">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium">{{props.workspace.name}}</h3>
                            
                        </div>
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>