import { createI18n } from 'vue-i18n';
import en from './locales/en.json';
import lv from './locales/lv.json';

const messages = {
  en,
  lv
};

const i18n = createI18n({
  locale: 'lv', // текущий язык
  fallbackLocale: 'lv', // язык по умолчанию, если перевод не найден
  messages
});

export default i18n;
