<template>
  <div class="flex space-x-4">
    <button class=" text-black cursor-pointer hidden lg:block"@click="setLocale('en')"><img src="../../photos/uk.png"  class="opacity-60 w-8 h-6"></button>
    <button class=" text-black cursor-pointer hidden lg:block" @click="setLocale('lv')"><img src="../../photos/lv.png" class="opacity-60 w-8 h-6"></button>
  </div>
</template>

<script>
import { useI18n } from 'vue-i18n';

export default {
  name: 'LanguageSwitcher',
  setup() {
    const { locale } = useI18n();

    const setLocale = (lang) => {
      locale.value = lang;
    };

    return { setLocale };
  }
};
</script>
