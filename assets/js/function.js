export const dateOption = {
    month: 'long',
    day: '2-digit',
    year: 'numeric',
    weekday: 'long',
};

export const dateLocale = 'id';

export const dateFormat = function (dateString) {
    const date = String(dateString);

    if (!dateString)
        return new Date().toLocaleDateString(dateLocale, dateOption);

    return new Date(date).toLocaleDateString(dateLocale, dateOption);
};
