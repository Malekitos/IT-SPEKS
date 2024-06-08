<template>
  <div>
    <button @click="setLocale('en')">English</button>
    <button @click="setLocale('lv')">Latviski</button>
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
