<?php
/**
 * LaraClassified - Classified Ads Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: http://www.bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from Codecanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Post;
use Jenssegers\Date\Date;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioSmsMessage;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class PostArchived extends Notification implements ShouldQueue
{
	use Queueable, SendGrid;
	
	protected $post;
	protected $archivedPostsExpiration;
	
	public function __construct(Post $post, $archivedPostsExpiration)
	{
		$this->post = $post;
		$this->archivedPostsExpiration = $archivedPostsExpiration;
	}
	
	public function via($notifiable)
	{
		if (!empty($this->post->email)) {
			return ['mail'];
		} else {
			if (config('settings.sms.driver') == 'twilio') {
				return [TwilioChannel::class];
			}
			
			return ['nexmo'];
		}
	}
	
	public function toMail($notifiable)
	{
		$repostUrl = lurl('account/archived/' . $this->post->id . '/repost');
		
		return (new MailMessage)
			->subject(trans('mail.post_archived_title', ['title' => $this->post->title]))
			->greeting(trans('mail.post_archived_content_1'))
			->line(trans('mail.post_archived_content_2', [
				'title'   => $this->post->title,
				'now'     => Date::now(config('timezone.id'))->formatLocalized(config('settings.app.default_date_format')),
				'appName' => config('app.name'),
			]))
			->line(trans('mail.post_archived_content_3', ['repostUrl' => $repostUrl]))
			->line(trans('mail.post_archived_content_4', [
				'dateDel' => $this->post->archived_at
					->addDays($this->archivedPostsExpiration)
					->formatLocalized(config('settings.app.default_date_format')),
			]))
			->line(trans('mail.post_archived_content_5'))
			->line('<br>')
			->line(trans('mail.post_archived_content_6'));
	}
	
	public function toNexmo($notifiable)
	{
		return (new NexmoMessage())->content($this->smsMessage())->unicode();
	}
	
	public function toTwilio($notifiable)
	{
		return (new TwilioSmsMessage())->content($this->smsMessage());
	}
	
	protected function smsMessage()
	{
		return trans('sms.post_archived_content', ['appName' => config('app.name'), 'title' => $this->post->title]);
	}
}
