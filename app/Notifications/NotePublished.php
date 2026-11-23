<?php

namespace App\Notifications;

use App\Models\Note;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotePublished extends Notification
{
    use Queueable;

    /**
     * Нотатка, про яку повідомляємо власника.
     */
    public function __construct(public Note $note)
    {
        //
    }

    /**
     * Канали доставки: email та запис у таблицю notifications.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Лист власнику нотатки.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Нову нотатку збережено: '.$this->note->title)
            ->greeting('Вітаємо, '.$notifiable->name.'!')
            ->line('У Notes App збережено нову нотатку «'.$this->note->title.'».')
            ->line(\Illuminate\Support\Str::limit($this->note->description, 200))
            ->action('Відкрити нотатку', url('/notes/'.$this->note->id))
            ->salutation('З повагою, Notes App');
    }

    /**
     * Дані, що зберігаються в колонці data таблиці notifications.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'note_id' => $this->note->id,
            'title' => $this->note->title,
        ];
    }
}
