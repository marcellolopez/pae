<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
class ConfirmacionComercial extends Notification implements ShouldQueue
{
    use Queueable;
    protected $paciente;
    /**
    * Create a new notification instance.
    *
    * @return void
    */
    public function __construct($paciente_array)
    {
        $this->paciente  = (object) $paciente_array;                                                       
    }
    /*/
    public function toDatabase($notifiable)
    {

        return [
            'detalleReserva' =>  $this->detalleReserva
        ];

    }
    /*/
    /**
    * Get the notification's delivery channels.
    *
    * @param  mixed  $notifiable
    * @return array
    */

    public function via($notifiable)
    {
        return ['mail'];
    }



    /**
    * Get the mail representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return \Illuminate\Notifications\Messages\MailMessage
    */
    public function toMail($notifiable)
    {
        $notifiable->email = 'mlc74163322@gmail.com';
        return (new MailMessage)
            ->cc(['smaldonado@cetep.cl', 'mramirez@cetep.cl', 'mfernandez@cetep.cl', 'msala@otecimpulsa.cl'
])
            ->subject('Confirmación de registro')
            ->line('')
            ->markdown('vendor.notifications.confirmacion_comercial', ['paciente' => $this->paciente]);
            

    }
/**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}