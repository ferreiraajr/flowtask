<script setup lang="ts">
import { Button } from '@/components/ui/button'
import { Card, CardHeader, CardTitle, CardContent, CardFooter } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Textarea } from '@/components/ui/textarea'
import type { UseFormReturn } from '@inertiajs/vue3'


interface Props {
  form: UseFormReturn<{ name: string; description?: string }>
  submit: () => void
  submitLabel?: string
}

const props = defineProps<Props>()
</script>

<template>
  <Card class="w-full max-w-xl mx-auto mt-8">
    <form @submit.prevent="props.submit">
      <CardHeader>
        <CardTitle>Workspace</CardTitle>
      </CardHeader>

      <CardContent class="space-y-4">
        <div class="flex flex-col space-y-2">
          <Label for="name">Nome</Label>
          <Input id="name" v-model="props.form.name" placeholder="Ex: Desenvolvimento de Sistemas" />
          <span v-if="props.form.errors.name" class="text-xs text-red-500">{{ props.form.errors.name }}</span>
        </div>

        <div class="flex flex-col space-y-2">
          <Label for="description">Descrição</Label>
          <Textarea id="description" v-model="props.form.description" rows="3" />
          <span v-if="props.form.errors.description" class="text-xs text-red-500">
            {{ props.form.errors.description }}
          </span>
        </div>
      </CardContent>

      <CardFooter class="flex justify-end">
        <Button type="submit" :disabled="props.form.processing">
          {{ props.submitLabel ?? 'Salvar' }}
        </Button>
      </CardFooter>
    </form>
  </Card>
</template>