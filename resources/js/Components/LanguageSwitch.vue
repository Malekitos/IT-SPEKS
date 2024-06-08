<template>
  <div class="flex space-x-4">
    <button class=" text-black cursor-pointer"@click="setLocale('en')">EN</button>
    <button class=" text-black cursor-pointer" @click="setLocale('lv')">LV</button>
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
