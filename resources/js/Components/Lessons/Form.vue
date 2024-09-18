<script>
    export default {
        name: 'LessonsForm'
    }

</script>

<script setup>
    import FormSection from '../FormSection.vue';
    import InputError from '../InputError.vue';
    import InputLabel from '../InputLabel.vue';
    import PrimaryButton from '../PrimaryButton.vue';
    import TextInput from '../TextInput.vue';
    import SecondaryButton from '../SecondaryButton.vue';
    import CollectionSelector from '../Common/CollectionSelector.vue';


    defineProps({
        form: {
            type: Object,
            required: true
        },
        updating: {
            type: Boolean,
            required: false, 
            default: false
        },
        levels: {
            type: Object,
            required: true
        },
        categories: {
            type: Object,
            required: true
        }
    });

    defineEmits(["submit"]);
</script>
<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Update Lesson' : 'Create Lesson'}}
        </template>

        <template #description>
            {{ updating ? "Update the selected lesson" : "Create a New Lesson" }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <!--Nombre-->
                <InputLabel for="name" value="Name" />
                <TextInput id="name" for="name" v-model="form.name" type="text" autocomplete="name" class="mt-1 block w-full"/>
                <InputError :message="$page.props.errors.name" class="mt-2" />
                <br />
                <!--Descripcion-->
                <InputLabel for="description" value="Description" />
                <TextInput id="description" for="description" v-model="form.description" type="text" autocomplete="description" class="mt-1 block w-full"/>
                <InputError :message="$page.props.errors.description" class="mt-2" />
                <br />
                <!--URL Imagen-->
                <InputLabel for="image_uri" value="URL Image" />
                <TextInput id="image_uri" for="image_uri" v-model="form.image_uri" type="text" autocomplete="image_uri" class="mt-1 block w-full"/>
                <InputError :message="$page.props.errors.image_uri" class="mt-2" />
                <br />
                <!--URL Imagen-->
                <InputLabel for="content_uri" value="URL Content" />
                <TextInput id="content_uri" for="content_uri" v-model="form.content_uri" type="text" autocomplete="content_uri" class="mt-1 block w-full"/>
                <InputError :message="$page.props.errors.content_uri" class="mt-2" />
                <br />
                <!--URL PDF-->
                <SecondaryButton class="mt-2 mr-2" type="button">Upload PDF</SecondaryButton>
                <InputError :message="$page.props.errors.pdf_uri" class="mt-2" />
                <br />
                
                <div class="flex ">
                    <div class="w-1/2">
                        <!--Niveles-->
                        <InputLabel for="level_id" value="Level"/>
                        <select v-model="form.level" name="level_id">
                            <option v-for="l in levels" :value="l.id" :key="l.id">{{ l.name }}</option>
                        </select>
                        <InputError :message="$page.props.errors.level_id" class="mt-2" />
                    </div>
                    <div class="w-1/2">
                    <!--Categorias-->
                        <InputLabel for="categories" value="Categories"/>
                        <CollectionSelector name="categories" id="categories" :collection="categories" />
                    </div>
                </div>
                
            </div>
        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? "Update" : "Create" }}
            </PrimaryButton>
        </template>
    </FormSection>

</template>