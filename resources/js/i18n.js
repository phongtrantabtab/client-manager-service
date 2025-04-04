import { createI18n } from 'vue-i18n';
import en from '../lang/en/en.json';
import vi from '../lang/vi/vi.json';

const defaultLocale = localStorage.getItem('locale') || 'en';
const i18n = createI18n({
    locale: defaultLocale,
    fallbackLocale: 'vi',
    messages: {vi, en}
})
export default i18n;
